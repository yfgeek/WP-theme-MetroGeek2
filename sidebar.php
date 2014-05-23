<div id="side">

	<div id="about" class="sids">
			<div class="sidetitle"><div class="lg"></div>公告</div>
			<p>网站正在全新建设 建设中 请多提意见</p>
			</div>
		
		<div id="cate" class="sids">
			<div class="sidetitle">分类</div>
			<ul>	
				<?php wp_list_categories('title_li='); ?>
			</ul>
		</div>
		<div id="commentside" class="sids">
			<div class="sidetitle">评论</div>
			<ul>
				<?php a_rcomments(6);?>	
			</ul>
		</div>
		<div id="tongji" class="sids">
			<div class="sidetitle">信息</div>
			<ul>
			<li><?php wp_loginout();?></li>
			<li>已经被访问<b><?php echo getindexview(); ?></b>次</li>
			</ul>
			</div>
	</div>
	</div>