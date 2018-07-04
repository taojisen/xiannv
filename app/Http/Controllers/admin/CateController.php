<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate;

class CateController extends Controller
{
    /**
     * 显示信息
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        /*多条件搜索
        $user = User::orderBy('user_id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $username = $request->input('keywords1');
                $email = $request->input('keywords2');
                //如果用户名不为空
                if(!empty($username)) {
                    $query->where('user_name','like','%'.$username.'%');
                }
                //如果邮箱不为空
                if(!empty($email)) {
                    $query->where('user_email','like','%'.$email.'%');
                }
            })
        ->paginate($request->input('num', 5));
        return view('admin.user.list',['user'=>$user, 'request'=> $request]);
         */
        
        // $res = User::where('username','like','%'.$request->input('search').'%')->
        //         paginate($request->input('num',10));

        // $arr = ['num'=>$request->input('num'),'search'=>$request->input('search')];     
        $aa = $request->input('cate_name');
        $cate = cate::select(\DB::raw('*,concat(path,cate_id) as paths '))->where('cate_name','like',"%$aa%")->orderBy('paths')->paginate($request->input('num',10));
        $data=['cate_name'=>$request->input('cate_name'),'num'=>$request->input('num')];
        return view('admin.cate.index',['title'=>'分类显示','cate'=>$cate,'data'=>$data]);
    }
 
    /**
     * 显示添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = \DB::select('select *,concat(path,cate_id) from cate order by concat(path,cate_id)');
        return view('admin.cate.add',['title'=>'表单添加','cate'=>$cate,'id'=>'0']);
    }
    public function add($id)
    {
        $cate = \DB::select('select *,concat(path,cate_id) from cate order by concat(path,cate_id)');
        return view('admin.cate.add',['title'=>'表单添加','cate'=>$cate,'id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取数据
        $data = $request->except(['_token']);
        //获取父id
        $pid = $data['pid'];
        //用通过pid找到 pid的父path.pid.','.
        if ($pid==0){
            $data['path'] = '0,';
        } else {
            $str = Cate::select('path')->where("cate_id",$pid)->first();
            $data['path']=$str->path.$pid.',';
        }
        //插入一条记录 
        cate::create($data);

        if($data){

            return redirect('/admins/cate')->with('info','添加成功');

        } else {

            return back();
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = cate::find($id);
        return view('admin.cate.edit',['title'=>'类别修改','cate'=>$cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

         $data = $request->input('cate_name');
         $arr = ['cate_name'=>$data,'cate_id'=>$id];
         $info = cate::where('cate_id',$id)->update($arr);

        //判断信息
        if($info){
            return redirect('/admins/cate')->with('info','修改成功');
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /**
         * 删除信息
         *
         * @id 
         */  
        $cate = Cate::where('pid','=',$id)->first()->toArray();
        // dd($cate);
        if ($cate) {
            return redirect('/admins/cate')->with('info','有子类不能删除');
            die;
        }

        $row = Cate::destroy($id);
        if($row){
            return redirect('/admins/cate')->with('info','删除成功');
        } else {
            return redirect('/admins/cate')->with('info','删除失败');
        }
    }
}
