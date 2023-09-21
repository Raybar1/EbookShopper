const addToShoppingButtons = document.querySelectorAll('.add-to-cart'); //add-to-cart es el id del boton de agregar al carro
addToShoppingButtons.forEach(addToShoppingButtons =>{
    addToShoppingButtons.addEventListener('click', addToClicked)
});

const comprarButton = document.querySelector('.comprarButton');
comprarButton.addEventListener('click', comprarButtonClicked);


const shoppingCartItemsContainer = document.querySelector('.shoppingCartItemsContainer'); //Este el nombre de donde estan los articulos

function addToClicked(event){
    const button = event.target;
    const item = button.closest('.single-products');
    const itemTitle = item.querySelector('.item-title').textContent; //poner en la clase de los nombres de los productos este nombre
    const itemPrice = item.querySelector('.item-price').textContent; //poner en la clase de los precios de los productos este nombre
    const itemImage = item.querySelector('.item-image').src;//poner en la clase de las imagenes de los productos este nombre
    addItemToShoppingCart(itemTitle, itemPrice, itemImage);
}


function addItemToShoppingCart(itemTitle, itemPrice, itemImage){
    
	const elementsTitle = shoppingCartItemsContainer.getElementsByClassName('shoppingCartItemTitle');
	for(let i=0; i<elementsTitle.length; i++){
		if(elementsTitle[i].innerText === itemTitle){
			let elementQuantity = elementsTitle[i].parentElement.parentElement.parentElement.querySelector('.shoppingCartItemQuantity');
			elementQuantity.value++;
			$('.toast').toast('show');
			updateShoppingCartTotal();
			return;
		}
	}



	const shoppingCartRow = document.createElement('div');
	//Este es el codigo html del producto que se mostrara en el carrito
    const shoppingCartContent = `
    <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src=${itemImage} alt="" />
										<h2>${itemPrice}</h2>
										<p>${itemTitle}</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
								</div>
							</div>
						</div>

						
    `;

    shoppingCartRow.innerHTML = shoppingCartItemsContent;
    shoppingCartItemsContainer.append(shoppingCartRow);


	shoppingCartRow.querySelector('.buttonDelete').addEventListener('click', removeShoppingCartItem);

	shoppingCartRow.querySelector('.shoppingCartItemQuantity').addEventListener('change', quantityChanged);

	updateShoppingCartTotal();
}

function updateShoppingCartTotal(){
	let total = 0;
	const shoppingCartTotal = document.querySelector('.shoppingCartTotal');//Poner en total el nombre de la clase asi
	const shoppingCartItems = document.querySelectorAll('.shoppingCartItem');//Poner en total el nombre de la clase asi
	
	shoppingCartItems.forEach((shoppingCartItem) =>{
		const shoppingCartItem = shoppingCartItem.querySelector('.shoppingCartItemPrice');

		const shoppingCartItemPrice = shoppingCartItemPriceElement.textContent.replace('$', '');
	
		const shoppingCartItemQuantityElement = shoppingCartItem.querySelector('.shoppingCartItemQuantity');

		const shoppingCartItemQuantity = Number(
			shoppingCartItemQuantityElement.value

		);
			total= total + shoppingCartItemPrice * shoppingCartItemQuantity;
		
	});
	shoppingCartTotal.innerHTML = `${total.toFixed(2)}$`;
}

function removeShoppingCartItem(event){
	const buttonClicked = event.target;
	buttonClicked.closest('.shoppingCartIten').remove();
	updateShoppingCartTotal();
}

function quantityChanged(event){
	const input = event.target;
	if(input.value <=0){
		input.value = 1;
	}
	updateShoppingCartTotal();
}

function comprarButtonClicked(){
	shoppingCartItemsContainer.innerHTML = '';
	updateShoppingCartTotal();
}