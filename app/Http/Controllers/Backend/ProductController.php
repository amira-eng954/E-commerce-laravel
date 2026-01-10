<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cat;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\CartEvent;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Notifications\ProductNotification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    use AuthorizesRequests;
    public function index()
    {
      $products=Product::with(['user',"cat"])->paginate(5);
   
      //dd($products);
    return view('admin.products.product',compact("products"));

    }

    public function show($id)
    {
        $data=Product::find($id);
        return view('admin.products.show',['data'=>$data]);
    }

    public function create()
    {
      $this->authorize('create',Product::class);
        $cats=Cat::all();
        $users=User::where('role','vendor')->get();
        //dd($users);
        return view('vendor.products.create',compact("cats","users"));
    }

    public function store (ProductRequest $request)
    {
        $data=$request->validated();
        $data['image']=Storage::putFile("products",$data['image']);
        $product=Product::create($data);
        //event(new cartEvent( $product) );
        //auth()->user()->notify(new ProductNotification($product));
        session()->flash('suc',"Product suc");
        return redirect(url('product'));
    }

    public function edit($id)
    {  
       $data=Product::find($id);
       $this->authorize('update',$data);
        $cats=Cat::all();
        $users=User::all();
        return view('admin.products.edit',compact("data","cats","users"));
    }

    public function update($id,UpdateProductRequest $request)
    {   
        $product=Product::find($id);
        $data=$request->validated();
        if($request->has('image'))
        {
            Storage::delete($product->image);
            $data['image']=Storage::putFile("products",$product['image']);
        }
        $product->update($data);
        session()->flash("suc"," Product updated");
        return redirect(url('product'));
    }

    public function destroy($id)
    {
        $product=Product::find($id);
        $this->authorize('delete',$product);
        Storage::delete($product['image']);
        $product->delete();
        session()->flash("suc"," Product deleted");
        return redirect(url('product'));  
    }

  public function  productTrash()
  {
    $products=Product::onlyTrashed()->paginate(5);
    return view('admin.products.trashed',compact("products"));

  }
   public function productrestore($id)
  {
    
    $product=Product::onlyTrashed()->find($id);
    $this->authorize('restore',$product);
    $product->restore();
     session()->flash("suc"," Product restored");
    return redirect(url('product'));

    
  }
   public function  productdestroy($id)
  {

    $product=Product::onlyTrashed()->find($id);
      $this->authorize('forceDelete',$product);
    $product->forceDelete();
     session()->flash("suc"," Product deleted forever");
    return redirect(url('product'));
    
  }


}
