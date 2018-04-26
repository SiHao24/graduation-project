<?php
	header('Content-type:text/html;charset=utf-8');
	require ('connect.php');
	$pdo -> exec("set names utf8");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>神圣的管理页面</title>
		<style>
			table tr td input{
				height: 20px;
			}
			.update-input{
				height: 60px;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" href="../css/index.css">
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top header" role="navigation">
			<div class="container">
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="nav navbar-nav" id="navBar">
						<li class="active" id="btnBook">
							<div class="arrow-top"></div>
							<a href="#borrowBook"><i class="iconfont">&#xe609;</i>图书列表</a>
						</li>
						<li id="btnList">
							<div class=""></div>
							<a href="#userInfo"><i class="iconfont">&#xe622;</i>用户列表</a>
						</li>
						<li id="btnself">
							<div class=""></div>
							<a href="#borrowInfor"><i class="iconfont">&#xe67e;</i>借阅列表</a>
						</li>
						<li id="btnmsg">
							<div class=""></div>
							<a href="#msg"><i class="iconfont">&#xe67e;</i>留言列表</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		
		<!-- 所有图书信息 -->
		<div class="container body-tab-ele"  id="borrowBook">
			<?php
				$sql = "select * from book";
				$pdo -> exec('set names utf8');
			?>
			<div class="alert alert-info">全部图书列表</div>
			<table border="1">
				<thead>
					<tr>
						<th>编号</th>
						<th>书名</th>
						<th>出版书号</th>
						<th>作者</th>
						<th>出版社</th>
						<th>出版日期</th>
						<th>单价</th>
						<th>库存</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pdo->query($sql) as $value) {?>
					<tr>
						<td><?=$value['b_id'] ?></td>
						<td><?=$value['b_name'] ?></td>
						<td><?=$value['publish'] ?></td>
						<td><?=$value['author'] ?></td>
						<td><?=$value['press'] ?></td>
						<td><?=$value['publish_at'] ?></td>
						<td><?=$value['price'] ?></td>
						<td><?=$value['number'] ?></td>
						<td><a href="bookedit.php?id=<?=$value['b_id'] ?>">修改</a> <a href="bookdel.php?id=<?=$value['b_id'] ?>" onclick="return del_comfirm();">删除</a></td>
					</tr>
					<?php } ?>
						<tr class="update-input">
							<form action="bookinsert.php" method="post">
								<td> 请输入 </td>
								<td>
									<input type="text" name="name"  >
								</td>
								<td>
									<input type="text" name="publish" >
								</td>
								<td>
									<input type="text" name="author"   >
								</td>
								<td>
									<input type="text" name="press"   >
								</td>
								<td>
									<input type="date" name="publish_at"   >
								</td>
								<td>
									<input type="text" name="price"   >
								</td>
								<td>
									<input type="text" name="number"   >
								</td>
								<td>
									<button type="submit" class="admin-add">添加</button>
								</td>
							</form>
						</tr>
				</tbody>
			</table>
		</div>



		<!-- 所有用户信息 -->
		<div class="container body-tab-ele" id="userInfo">
			<?php
				// header('content-type:text/html;charset=utf-8');
				$sql = "select * from user";
				// $pdo -> exec('set names utf8');
			?>
			<div class="alert alert-info">用户列表</div>
			<table border="1" class="table table-hover">
				<thead>
					<tr>
						<th>用户名</th>
						<th>密码</th>
						<th>邮箱</th>
						<th>性别</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<!-- query执行查询操作 -->
					<?php foreach ($pdo->query($sql) as $value) {?>
					<tr>
						<td><?=$value['u_name'] ?></td>
						<td><?=$value['pwd'] ?></td>
						<td><?=$value['email'] ?></td>
						<td><?=$value['sex'] ?></td>
						<td><a href="userdel.php?id=<?=$value['b_id']?> ?>" onclick="return del_comfirm();">删除</a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

		<!-- 所有借阅信息 -->
		<div class="container body-tab-ele" id="borrowInfo" >
			<?php
				$sql = "select * from list";
				$pdo -> exec('set names utf8');
			?>
			<div class="alert alert-info">借阅列表</div>
			<table border="1" class="table table-hover">
				<thead>
					<tr>
						<th>用户名</th>
						<th>书本编号</th>
						<th>开始日期</th>
						<th>归还日期</th>
						<th>借阅天数</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pdo->query($sql) as $value) {?>
					<tr>
						<td><?=$value['uname'] ?></td>
						<td><?=$value['b_id'] ?></td>
						<td><?=$value['begin'] ?></td>
						<td><?=$value['end'] ?></td>
						<td><?=$value['rest'] ?></td>
						<td><a href="listdel.php?id=<?=$value['b_id'] ?>&&name=<?=$value['uname'] ?>" onclick="return del_comfirm();">删除</a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>			
		</div>

		<!-- exec执行增加删除更新操作 -->
		<div class="container body-tab-ele" id="msg">
			<?php
				$sql = "select * from msg";
				$pdo -> exec('set names utf8');
			?>
			<div class="alert alert-info">留言列表</div>
			<table border="1" class="table table-hover">
				<thead>
					<tr>
						<th>用户名</th>
						<th>留言内容</th>
						<th>操作</th>	
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pdo->query($sql) as $value) {?>
					<tr>
						<td><?=$value['u_name'] ?></td>
						<td><?=$value['msg'] ?></td>
						<td><a href="msgdel.php?name=<?=$value['u_name'] ?>" onclick="return del_comfirm();">删除</a>
							<a href="msgreplay.php?name=<?=$value['u_name'] ?>" >回复</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="../js/adminIndex.js"></script>
		<script>
			function del_comfirm() {
				if(confirm('是否确认删除？')) {
					return true;
				} else {
					return false;
				}
			}
		</script>
	</body>
</html>