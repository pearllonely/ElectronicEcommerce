<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"/> -->
	<title>
		shopping cart with javascript using local storage -- fullyworld web tutorials
	</title>
	<link rel="stylesheet" href="index.css"/>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<script>
		
		function Delete(e){
			let items = [];
			JSON.parse(localStorage.getItem('items')).map(data=>{
				if(data.id != e.parentElement.parentElement.children[0].textContent){
					
					items.push(data);

				}
			});
			localStorage.setItem('items',JSON.stringify(items));
			window.location.reload();
		};
	</script>
</head>
<body>
				<div class="main">
					
					<div class="itemsBox">
<div class="item">
						<?php  $rows=$data['product'];
				foreach ($rows as $row) {?>
	<div class="item mx-2">

		<div class="card productCard mx-auto " >
			<img class="card-img-top" src="<?php echo $row->main_img; ?>" alt="Card image cap">
			<div class="row productCardbtns mx-0">
					<div class="mx-auto">  <a href="#" ><i class="fas fa-heart"></i></a></div> 
					<div class="mx-auto">  <a href="#" ><i class="fas fa-exchange-alt"></i></a></div> 
					  <a href="#" title="add to cart" class="attToCart fas fa-shopping-cart"></a>
			</div>
			<div class="card-body py-1">
				<h5 class="card-title"><?php echo $row->pro_name; ?></h5>
				<span ><?php echo $row->pro_price; ?></span>
				<input type="hidden" value="<?php echo $row->pro_id; ?>">
				<br>
			</div>
		</div>
	</div>

 <?php
}  
    ?>
  
</div>
				</div>
            </div>
         
			
	

	<!-- script -->
	<script>
    
    window.onload = function(){
    //cart box
	const iconShopping = document.querySelector('.iconShopping');
	

	// adding data to localstorage
	const attToCartBtn = document.getElementsByClassName('attToCart');
	let items = [];
	for(let i=0; i<attToCartBtn.length; i++){
		attToCartBtn[i].addEventListener("click",function(e){
			if(typeof(Storage) !== 'undefined'){
				let item = {
						id:i+1,
						name:e.target.parentElement.parentElement.children[2].textContent,
						price:e.target.parentElement.parentElement.children[2].children[0].textContent,
						proID:e.target.parentElement.parentElement.children[2].children[2].value,
						img:e.target.parentElement.parentElement.children[0].src,
						no:1
					};
				if(JSON.parse(localStorage.getItem('items')) === null){
					items.push(item);
					localStorage.setItem("items",JSON.stringify(items));
					window.location.reload();
				}else{
					const localItems = JSON.parse(localStorage.getItem("items"));
					localItems.map(data=>{
						if(item.id == data.id){
							item.no = data.no + 1;
						}else{
							items.push(data);
						}
					});
					items.push(item);
					localStorage.setItem('items',JSON.stringify(items));
					window.location.reload();
				}
			}else{
				alert('local storage is not working on your browser');
			}
		});
	}
    // adding data to shopping cart 
        //this code is to view number of product in cart

	const iconShoppingP = document.querySelector('.iconShopping p');
	let no = 0;
	JSON.parse(localStorage.getItem('items')).map(data=>{
		no = no+data.no;	});
	iconShoppingP.innerHTML = no;


   
}
    
    </script>
</body>
</html>