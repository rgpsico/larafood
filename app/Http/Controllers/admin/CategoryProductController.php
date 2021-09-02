<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    protected $product , $category;


    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
     
        
    }

    public function categories($idProduct)
    {
        $product = $this->product->find($idProduct);
        
        if(!$product){
            return redirect()->back();
        }

        $categories = $product->categories()->paginate();

        return view('admin.pages.products.categories.categories',compact('product','categories'));   
        
    }

    public function categoriesAvailable(Request $request , $idProduct)
    {
        
        if(!$product = $this->product->find($idProduct)){
            return redirect()->back();
        }
        
        $filters = $request->except('_token');
      

        $categories = $product->categoriesAvailable($request->filter);

        return view('admin.pages.products.categories.available',compact('product','categories','filters'));   

    }

    
    public function attachCategoriesProduct(Request $request , $idProduct)
    {             
        if(!$product = $this->product->find($idProduct)){
            return redirect()->back();
        }

        if (!$request->categories || count($request->categories) == 0) {
            return redirect()
            ->back()
            ->with('info','Precisa escolher pelo menos uma permissão');
        }

        $product->categories()->attach($request->categories);
        return redirect()->route('products.categories',$idProduct);
      }
    
      public function detachCategoryProduct($idProduct , $idCategoria)
      {   
               
          if(!$product = $this->product->find($idProduct)){
              return redirect()->back();
          }

          if(!$category = $this->category->find($idCategoria)){
            return redirect()->back();
        } 
        
          $product->categories()->detach($category);
           return redirect()->route('products.categories',$product->id);
        }



        public function products($idProduct) 
        {             
      
            if(!$category = $this->category->find($idProduct)){
                return redirect()->back();
            } 
        
            $products = $category->products()->paginate();
                return  view('admin.pages.category.products.product',compact('category','products'));
        }
}
