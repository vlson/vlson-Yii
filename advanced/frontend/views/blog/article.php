<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Story &mdash; Free Website Template, Free HTML5 Template by freehtml5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />

	

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/vendor/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/vendor/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/vendor/bootstrap.css">
	
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/blog.css">

	<!-- Modernizr JS -->
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body class="single">
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
		<div id="fh5co-aside" style="background-image: url(images/image_2.jpg)" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<nav role="navigation">
				<ul>
					<li><a href="index.html"><i class="icon-home"></i></a></li>
				</ul>
			</nav>
			<div class="page-title">
				<img src="images/person_1.jpg" alt="Free HTML5 by FreeHTMl5.co">
				<span>September 10, 2016</span>
				<h2>How to be an effective web developer</h2>
			</div>
		</div>
		<div id="fh5co-main-content">
			<div class="fh5co-post"> 
				<div class="fh5co-entry padding">
					<div class="post">
							<h1 class="postTitle">
								<a id="cb_post_title_url" class="postTitle2" href="https://www.cnblogs.com/johnson108178/p/9287101.html">高性能MySQL--innodb中事务的隔离级别与锁的关系</a>
							</h1>
							<div class="clear"></div>
							<div class="postBody">
								<div id="cnblogs_post_body" class="blogpost-body"><p>最近买了《高性能MySQL》这本书回来看，从中收益颇多！我来一吐为快！</p>
					<p>我们都知道事务，那么在什么情况下我们需要使用事务呢？</p>
					<p>银行应用是解释事务的一个经典例子。假设一个银行的数据库有两张表：支票（checking）和储蓄（savings）表。现在johnson要从支票账户中转移200块大洋到储蓄表中，那么至少需要三个步骤：</p>
					<ol>
					<li>检查支票账户余额是否高于200块大洋</li>
					<li>支票账户减少200块大洋</li>
					<li>储蓄账户中增加200块大洋</li>
					</ol>
					<p>试想一下，如果上面步骤执行到第二步，突然因为什么原因而终止了，顾客支票账户中莫名其妙的减少了200块大洋。如果顾客恰好是一位情绪激动的大妈，那你就等着大妈带着平底锅和四级头去银行找你吧！</p>
					<p>所以为了避免这种情况，就必须用到事务，上述三个步骤中有任何一个执行失败，就必须回滚所有的步骤，以免有大妈找上门。事务SQL如下所示：</p>
					<ol>
					<li>START TRANSACTION;</li>
					<li>SELECT balance FROM checking WHERE customer_id=123456;</li>
					<li>UPDATE checking SET balance = balance - 200 WHERE customer_id=123456;</li>
					<li>UPDATE savings SET balance = balance + 200 WHERE customer_id=123456;</li>
					<li>COMMIT;</li>
					</ol>
					<p>事务之所以可靠，当然离不开ACID特性：</p>
					<ul>
					<li>原子性(atomicity)：整个事务中的操作要么全部成功，要么全部失败。</li>
					<li>一致性(consistency)：数据库总是从一个一致性状态转换到另一个一致性状态。比如上面所说的，事务开始前和执行后，顾客johnson在银行的总账户余额是一样的。</li>
					<li>隔离性(isolation)：通常来说，一个事务所做的修改在提交之前，其他事务是不可见的。也就是说事务间是相互隔离的。</li>
					<li>持久性(durability)：事务在提交之后，对数据库数据所做的修改是永久性的。</li>
					</ul>
					<p>细心的人可能会注意到。在讨论隔离性的时候，我用了“通常来说”，下面就让我们讨论下事务的隔离级别。</p>
					<table style="height: 113px; width: 693px" border="0">
					<tbody>
					<tr>
					<td style="text-align: left">隔离级别</td>
					<td>脏读可能性</td>
					<td>不可重复读可能性</td>
					<td>幻读可能性</td>
					<td>加锁读</td>
					</tr>
					<tr>
					<td>READ UNCOMMITTED</td>
					<td>YES</td>
					<td>YES</td>
					<td>YES</td>
					<td>NO</td>
					</tr>
					<tr>
					<td>READ COMMITTED</td>
					<td>NO</td>
					<td>YES</td>
					<td>YES</td>
					<td>NO</td>
					</tr>
					<tr>
					<td>REPEATABLE READ</td>
					<td>NO</td>
					<td>NO</td>
					<td>YES</td>
					<td>NO</td>
					</tr>
					<tr>
					<td>SERIALIZABLE</td>
					<td>NO</td>
					<td>NO</td>
					<td>NO</td>
					<td>YES</td>
					</tr>
					</tbody>
					</table>
					<p style="text-align: left">&nbsp;</p>
					<ul style="text-align: left">
					<li>未提交读(READ UNCOMMITTED)：事务中的修改，即使没有提交，其他事务也可以读到，这就有可能造成了脏读。</li>
					<li>提交读(READ COMMITTED)：大多数数据库系统默认实用的隔离级别就是这种，但mysql不是。READ&nbsp;COMMITTED就是在事务提交前，所做的修改对其他事务是不可见的。但READ&nbsp;COMMITTED可能会造成不可重复读。就是在一个事务中，同样的查询语句，可能会得到不一样的结果。其实就是在两次查询中间，另一个事务修改了查询结果的值。</li>
					<li>可重复读(REPETABLE READ)：REPETABLE READ解决了脏读和不可重复读的问题，但理论上，REPETABLE READ无法解决幻读的问题。幻读就是指，一个事务在读取某一范围的值时，另一个事务恰好在该范围内插入了新纪录，那么当你再次读取该范围的值时，就会产生幻行。这与不可重复读有点像，只不过不可重复读时<strong>UPDATE</strong>，而幻读时<strong>INSERT</strong>。</li>
					<li>可串行化(SERIALIZABLE)：SERIALIZABLE读取每一行数据都要加锁，强制事务串行执行，所以可能导致大量的超时和锁争用问题。</li>
					</ul>
					<p>到这里，如果还不是太懂，你需要细细消化下前面的内容，这时可以打开mysql，将隔离级别设置为READ COMMITTED。然后试试它是不是解决了脏读，会不会出现不可重复读？再将隔离级别设置为REPETABLE READ。看看REPETABLE READ是不是解决了不可重复读，会不会出现幻读？</p>
					<div class="cnblogs_code">
					<pre>SET session transaction isolation level read committed;</pre>
					</div>
					<p>如果你真的实验了，会发现mysql的REPETABLE READ隔离级别并不会出现幻读的现象。那你有没有想过mysql的事务是怎么实现的呢？</p>
					<p>你肯定听说mysql的表锁和行锁，那你可能以为事务是基于行锁实现的。其实并没有那么简单，为了提高并发性能，mysql的大多是事务引擎都同时实现了多版本并发控制（MVCC）。它在很多情况下避免了加锁操作，所以开销更低。MVCC大都实现了非阻塞的读操作，写操作也只锁定必要的行。</p>
					<p>那么InnoDB中的MVCC是如何工作的呢？其实是通过在每行数据后面增加两个列，一个是创建版本号，一个是删除版本号。里面存储的是系统版本号，你开启一个事务系统版本号就会递增。事务开始时刻的系统版本号就作为事务版本号，用来和查询的每行记录的版本号做比较。下面看下REPETABLE READ隔离界别下，MVCC具体是如何操作的。</p>
					<ul>
					<li>SELECT查询出的数据需要满足2个条件&nbsp; &nbsp; 1、创建版本号 &lt;= 系统版本号&nbsp; 2、删除版本号为空或删除版本号&gt;系统版本号</li>
					<li>INSERT　&nbsp; &nbsp; 为新插入的每一行保存当前事务版本号为行的创建版本号</li>
					<li>UPDATE　　为插入的一行新记录保存当前事务版本号为行的创建版本号，同时保存当前事务版本号为原来的行的删除版本号</li>
					<li>DELETE　　为删除的每一行保存当前事务版本号为行的删除版本号</li>
					</ul>
					<p>保存这两个额外的系统版本号，可以使大多数读操作都不用加锁，这样性能就会更好。但需要额外的存储空间和一些额外的检查工作，这也相当于用空间换时间。</p>
					<p>在某些情况下我们还是需要用的锁。InnoDB采用两段锁协议。在事务执行过程中随时都可以加锁，事务提交或回滚时同时释放所有锁。这些锁一般都是隐式锁定，InnoDB会根据需要自动加锁。当然，你也可以通过SQL语句自己加锁：</p>
					<div class="cnblogs_code">
					<pre><span style="color: #000000">SELECT ..... LOCK IN SHARE MODE;     乐观锁
					SELECT ..... FOR UPDATE;             悲观锁</span></pre>
					</div>
					<p>个人建议，除非你明确知道自己在干什么，否则轻易不要显式加锁，只会事倍功半！！！</p></div><div id="MySignature"></div>
					<div class="clear"></div>
					<div id="blog_post_info_block">
					<div id="BlogPostCategory"></div>
					<div id="EntryTag">标签: <a href="http://www.cnblogs.com/johnson108178/tag/mysql/">mysql</a></div>
					
					
					</div>
					</div>
					</div>
				</div>
				
				

			</div>
		</div>
	</div>

	<div class="fh5co-navigation">
		<div class="fh5co-cover prev fh5co-cover-sm" style="background-image: url(images/project-4.jpg)">
			<div class="overlay"></div>

			<a class="copy" href="#">
				<div class="display-t">
					<div class="display-tc">
						<div>
							<span>Previous Post</span>
							<h2>How to be an affective web developer</h2>
						</div>
					</div>
				</div>
			</a>

		</div>
		<div class="fh5co-cover next fh5co-cover-sm" style="background-image: url(images/project-5.jpg)">
			<div class="overlay"></div>
			<a class="copy" href="#">
				<div class="display-t">
					<div class="display-tc">
						<div>
							<span>Next Post</span>
							<h2>How to be an affective web developer</h2>
						</div>
					</div>
				</div>
			</a>

		</div>
	</div>

	<footer>
		<div>
			Copyright &copy; 2018-至今 <a href="http://www.vlson.top" title="微醺阁" target="_blank">vlson.top</a> 
		</div>
	</footer>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/vendor/jquery-1.11.2.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/vendor/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/vendor/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/vendor/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/vendor/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/blog.main.js"></script>

	</body>
</html>

