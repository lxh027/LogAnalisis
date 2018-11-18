<title>验证用户信息</title>
<meta charset="utf-8">
    <?php
        function get_str($str){
            $val = ($_POST[$str]) ? $_POST[$str] : null;
            return $val;
        }
        $user=get_str("user");
        $password=get_str("password");
        if ($user==null || $password==null) {
            ?>
            <script type="text/javascript">
                alert("用户名或密码为空，请重新输入");
                window.location.href = "login.html";
            </script>
            <?php
        }
        $con=mysqli_connect("localhost","root","") or die("数据库链接失败");
        $sel=mysqli_select_db($con,"loganalisis") or die("数据库选择失败");
        $sql="select * from user where name='$user'";
        $info=mysqli_query($con,$sql);
        $num=mysqli_num_rows($info);
        if ($num==null) {
            ?>
            <script>
                alert("用户名错误，请重新输入");
                window.location.href=("login.html");
            </script>
            <?php
        }
        else $row=mysqli_fetch_array($info);

        if ($row['password']==$password) {
            ?>
            <script>
                alert("登陆成功");
                window.location.href=("select_table.php");
            </script>
            <?php
        }
            ?>
        <script>
            alert("密码错误");
            window.location.href=("login.html");
        </script>

