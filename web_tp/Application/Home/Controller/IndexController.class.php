<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index() {
        $this -> display();
    }

    public function login() {
        $username = ($_POST['user'])?$_POST['user']:null;
        $password = ($_POST['password'])?$_POST['password']:null;
        if ($username==null||$password==null) {
            $this -> error('用户名或密码为空！');
        } else{
            $user_db = D('User');
            $condition['name'] = $username;
            $result = $user_db -> where($condition) -> select();
            if (count($result)==0) {
                $this -> error('用户名不存在！');
            }
            foreach ($result as $arr){
                $pw = $arr['password'];
            }
            //echo $pw $password;
            if ($pw!=$password){
                $this -> error('密码错误！');
            }
            $this -> success('登录成功！','choose');
        } 
    }

    public function choose(){
        //$this -> display();
        $tbnames = D() -> db() -> getTables();
        $tot = count($tbnames);
        $this -> assign('tot',$tot);
        $this -> assign('tbname',$tbnames);
        $this -> display();
    }

    public function showtable(){
        if ($_POST['select_db']){
            $tbname = $_POST['select_db'];
            $_SESSION['tbname']=$tbname;
        } else $tbname=$_SESSION['tbname'];
        $table = D($tbname);
        $columns = $table -> getDbFields();
        $columns_sum = count($columns);
        
        $page = $_GET['p']?$_GET['p']:1;
        $list = $table -> order('id') -> page($page.',100') -> select();
        $list_sum = count($list);
        $count = $table -> count();
        $P = new \Think\Page($count,100);
        $show = $P -> show();
        

        $this -> assign('tbname',$tbname);
        $this -> assign('columns',$columns);
        $this -> assign('columns_sum',$columns_sum);
        $this -> assign('count',$list_sum);
        $this -> assign('list',$list);
        $this -> assign('page',$show);

        $this -> display();
    }


    public function search() {
        if ($_POST['select_db']){
            $tbname = $_POST['select_db'];
            $_SESSION['tbname'] = $tbname;
        } else $tbname = $_SESSION['tbname'];
        if ($_POST['select_fd']) {
            $fdname = $_POST['select_fd'];
            $_SESSION['fdname'] = $fdname;
        }else $fdname = $_SESSION['fdname'];
        if ($_POST['content']){
            $key = $_POST['content'];
            $_SESSION['key'] = $key;
        } else $key = $_SESSION['key'];
        $table = D($tbname);
        $columns = $table -> getDbFields();
        $columns_sum = count($columns);
        
        $where[$fdname]=array('like','%'.$key.'%');
        $page = $_GET['p']?$_GET['p']:1;
        $starttime = explode(' ',microtime());
        $list = $table -> where($where) -> order('id') -> page($page.',100') -> select();
        $endtime = explode(' ',microtime());
        $thistime = $endtime[0]+$endtime[1]-($starttime[0]+$starttime[1]);
        $thistime = round($thistime,3);
        $list_sum = count($list);
        $count = $table -> where($where) -> count();
        $P = new \Think\Page($count,100);
        $show = $P -> show();
        

        $this -> assign('tbname',$tbname);
        $this -> assign('fdname',$fdname);
        $this -> assign('key',$key);
        $this -> assign('tot',$count);
        $this -> assign('time',$thistime);
        $this -> assign('columns',$columns);
        $this -> assign('columns_sum',$columns_sum);
        $this -> assign('count',$list_sum);
        $this -> assign('list',$list);
        $this -> assign('page',$show);

        $this -> display();
    }
}