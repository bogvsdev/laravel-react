import Flux from '../helpers/mcflux';
import ProductStore from '../stores/ProductStore';

let ProductAction = Flux.createActions({
    update_products: (data)=>{
       return {
          actionType: "UPDATE_PRODUCTS",
          data: data
       }
    }
});

function getState(){
   return {
       products: ProductStore.getProducts()
   }
}

export {
    ProductAction,
    getState
}