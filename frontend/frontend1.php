
    <style>

.label-container{
	position:fixed;
	display:table;
	z-index: 99999999999;
	
}
.label-container{
	bottom:48px;
	left:105px;
}

.label-text{
	color:#FFF;
	background:rgba(51,51,51,0.5);
	display:table-cell;
	vertical-align:middle;
	padding:10px;
	border-radius:3px;
	font-size: 14px;
}

.label-arrow{
	display:table-cell;
	vertical-align:middle;
	color:#333;
	opacity:0.5;
}

.float{
	position:fixed;
	width:60px;
	height:60px;
	background-color:#00bb00;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
	z-index: 99999999999;
}
.float{
	
	bottom:40px;
	left:40px;

}


.my-float{
	font-size:24px;
	margin-top:18px;
}
.fa{
	font-size:24px;
	margin-top:20px;
}


a.float:hover + div.label-container{
  visibility: visible;
  opacity: 1;
}
    </style>
  

  