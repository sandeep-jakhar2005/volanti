<?php

namespace Webkul\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Webkul\Core\Repositories\SliderRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Velocity\Helpers\Helper;
use Webkul\Velocity\Http\Controllers\Shop\ShopController;
use Webkul\Velocity\Repositories\VelocityCustomerCompareProductRepository as CustomerCompareProductRepository;


class ProductsCategoriesProxyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Category\Repositories\CategoryRepository  $categoryRepository
     * @param  \Webkul\Product\Repositories\ProductRepository  $productRepository
     *  @param  \Webkul\Velocity\Helpers\Helper  $velocityHelper
     *  @param  \Webkul\Velocity\Repositories\VelocityCustomerCompareProductRepository  $compareProductsRepository

     * @return void
     */
    public function __construct(
        protected CategoryRepository $categoryRepository,
        protected ProductRepository $productRepository,
        protected SliderRepository $sliderRepository,
        protected Helper $velocityHelper,
        protected CustomerCompareProductRepository $compareProductsRepository
    ) {
        parent::__construct();
    }

    /**
     * Show product or category view. If neither category nor product matches, abort with code 404.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View|\Exception
     */

    public function old_index(Request $request,$slugOrPath = null)
    {
        if (preg_match('/^([\x{0621}-\x{064A}\x{4e00}-\x{9fa5}\x{3402}-\x{FA6D}\x{3041}-\x{30A0}\x{30A0}-\x{31FF}_a-z0-9-]+\/?)+$/u', $slugOrPath)) {
            if ($category = $this->categoryRepository->findByPath($slugOrPath)) {
                $childCategory = $this->categoryRepository->getChildCategories($category->id);

                // dd($category);

                return view($this->_config['category_view'], compact('category', 'childCategory'));
            }

            if ($product = $this->productRepository->findBySlug($slugOrPath)) {
                if (
                    $product->visible_individually
                    && $product->url_key
                    && $product->status
                ) {

                    // $related_products = DB::table('product_flat')
                    //     ->select('product_flat.name', 'product_flat.description')
                    //     ->join('product_categories', 'product_flat.product_id', '=', 'product_categories.product_id')
                    // ->where('product_flat.product_id', '!=', $product->id) // Exclude the specified product
                    // ->whereIn('product_categories.category_id', function ($query) use ($product) {
                    //     $query->select('category_id')
                    //         ->from('product_categories')
                    //         ->where('product_id', $product->id);
                    // })
                    // ->get();

                    // $cat_id = DB::table('product_categories')
                    //     ->select('product_categories.category_id')
                    //     ->where('product_categories.product_id', $product->id)
                    //     ->get();

                    // foreach ($cat_id as $category_id) {
                    //     $category_id = $category_id->category_id; //get category_id
                    // }
                    // $products = $this->productRepository->getAll($category_id);
                    // $you_may_also_like = collect($products->items())->map(function ($product) {
                    //     return $this->velocityHelper->formatProduct($product); //get products related to category
                    // });

                    //    echo "<pre>";
                    //    print_r($you_may_also_like);

                    $categoryId = $product->categories()->pluck('category_id');
                    $PID = $product->categories()->pluck('product_id');
                    // // echo $categoryIds;
                    // // // echo $PID;
                    //   echo "<pre>";
                    // print_r($categoryIds);
                    if (isset($categoryId) && count($categoryId) > 0) {
                        //dd($categoryId[0]);
                        $category = $this->categoryRepository->findById($categoryId[0]);
                        // print_r($category->products()->take(4)->get());
                        // print_r($product->related_products()->take(core()-> getConfigData('catalog.products.product_view_page.no_of_related_products'))->get());

// dd($product->related_products()->take(core()->getConfigData('catalog.products.product_view_page.no_of_related_products'))->get());
                        return view($this->_config['product_view'], [
                            'product' => $product,
                            'customer' => auth()->guard('customer')->user(),
                            'relatedProducts' => $product->related_products()->take(core()->getConfigData('catalog.products.product_view_page.no_of_related_products'))->get(),
                            'upSellProducts' => $product->up_sells()->take(core()->getConfigData('catalog.products.product_view_page.no_of_up_sells_products'))->get(),
                            'youMayAlsoLikeIts' => $category->products()->take(4)->get(),
                        ]);
                    } else {
                        return view($this->_config['product_view'], [
                            'product' => $product,
                            'customer' => auth()->guard('customer')->user(),
                            'relatedProducts' => $product->related_products()->take(core()->getConfigData('catalog.products.product_view_page.no_of_related_products'))->get(),
                            'upSellProducts' => $product->up_sells()->take(core()->getConfigData('catalog.products.product_view_page.no_of_up_sells_products'))->get()
                        ]);
                    }
                }
            }

            abort(404);
        }

        $sliderData = $this->sliderRepository->getActiveSliders();

        return view('shop::home.index', compact('sliderData'));
    }

    public function index(Request $request)
    {
        $slugOrPath = trim($request->getPathInfo(), '/');
        $slugOrPath = urldecode($slugOrPath);


        // support url for chinese, japanese, arabic and english with numbers.
        if (preg_match('/^([\x{0621}-\x{064A}\x{4e00}-\x{9fa5}\x{3402}-\x{FA6D}\x{3041}-\x{30A0}\x{30A0}-\x{31FF}_a-z0-9-]+\/?)+$/u', $slugOrPath)) {
            if ($category = $this->categoryRepository->findByPath($slugOrPath)) {
                $childCategory = $this->categoryRepository->getChildCategories($category->id);

                $combinedIds = $category->id;

                if ($childCategory->isNotEmpty()) {
                    $childCategoryIds = $childCategory->pluck('id')->toArray();
                    $combinedIds .= ',' . implode(',', $childCategoryIds);
                }

                $getCategorydetail = $this->getCategorydetail($combinedIds);

                return view($this->_config['category_view'], compact('category', 'childCategory', 'getCategorydetail'));

                // return view($this->_config['category_view'], compact('category', 'childCategory'));
            }

            abort(404);
        }

        $sliderData = $this->sliderRepository->getActiveSliders();

        return view('shop::home.index', compact('sliderData'));
    }

    // sandeep || this get all the category products
    public function getCategorydetail($categoryId)
    {

        /* fetch category details */
        $categoryDetails = $this->categoryRepository->find($categoryId);
        if (!$categoryDetails) {
            /* if category not found then return empty response */
            return response()->json([
                'products' => [],
                'paginationHTML' => '',
                'product_category' => [],
            ]);
        }

        /* fetching products */
        $products = $this->productRepository->getAll($categoryId);
        $products->withPath($categoryDetails->slug);
        $productCategoryId = array_map('intval', explode(',', $categoryId)); //converted to integer


        return [
            'products' => collect($products->items())->map(function ($product) {
                return $this->velocityHelper->formatProduct($product);
            }),
            'paginationHTML' => $products->appends(request()->input())->links()->toHtml(),
            'product_category' => DB::table('product_categories')
                ->select('*')
                ->whereIn('category_id', $productCategoryId)
                ->get(),
        ];
    }

    // sandeep || the single product info
    public function product_info()
    {
        $slugOrPath = request()->input('slug');
        // $slugOrPath = 'sandwich';

        if ($product = $this->productRepository->findBySlug($slugOrPath)) {
            if ($product->visible_individually && $product->url_key && $product->status) {
                $categoryId = $product->categories()->pluck('category_id');
                $viewData = [
                    'product' => $product,
                    'customer' => auth()->guard('customer')->user(),
                ];


                if (isset($categoryId) && count($categoryId) > 0) {
                    $category = $this->categoryRepository->findById($categoryId[0]);
                    $viewData['youMayAlsoLikeIts'] = $category->products()->take(4)->get();
                }

                $renderedView = view('shop::products.single-product-info', ['product' => $product])->render();
                return response()->json(['html' => $renderedView,'product_id'=>$product->id]);

            }
        }

        // Handle case when product is not found or not visible
        return response()->json(['error' => 'Product not found'], 404);
    }

}