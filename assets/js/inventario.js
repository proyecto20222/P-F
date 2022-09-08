class Product {
  constructor(nombre, material, cantidad){
    this.nombre = nombre;
    this.material = material;
    this.cantidad = cantidad; 
  }
}

class UI{

addProduct(product) {
const productList = document.getElementById('product-list');
const element = document.createElement('div');
element.innerHTML =`
<div class="card text-center col-mb-9">
  <div class="card-body">
   <strong>Nombre</strong>: ${product.nombre}
   <strong>Material</strong>: ${product.material}
   <strong>Cantidad</strong>: ${product.cantidad}
   <a href="#" class="btn btn-danger" name="delete">Eliminar</a>
  </div>
</div>
`;
productList.appendChild(element);

}

resetForm() {
  document.getElementById('product-form').reset();
}


deleteProduct(element) {
if(element.name === 'delete'){
  element.parentElement.parentElement.parentElement.remove();
  this.showMessage('Producto Eliminado Satisfactoriamente')
}
 
}

showMessage(message, cssClass) {
  const div = document.createElement('div');
  div.className ='alert alert-${cssClass}';
  div.appendChild(document.createTextNode(message));
  // showing in DOM
  const container = document.querySelector('.container')
  const app = document.querySelector('#App')
  container.insertBefore(div, app);
  setTimeout(function () {
    document.querySelector('.alert').remove();
  }, 3000);
}
}

// D0M Events
document.getElementById('product-form')
.addEventListener('submit', function (e) {
  const nombre = document.getElementById('nombre').value;
  const material = document.getElementById('material').value;
  const cantidad = document.getElementById('cantidad').value;

 const product = new Product(nombre, material, cantidad);

  const ui = new UI ();
  ui.addProduct(product);
  ui.resetForm();
  ui.showMessage('Producto Agregado Satisfactoriamente', 'success');

 e.preventDefault();
});

document.getElementById('product-list').addEventListener('click', function() {
  const ui = new UI();
  ui.deleteProduct(e.target);
});