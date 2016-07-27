import Flux from '../helpers/mcflux';

let _products = [];

function update_products(data){
    _products = data;
}

let ProductStore = Flux.createStore({
    getProducts: ()=>{
       return _products;
    }
}, (payload)=>{
    if(payload.actionType === "UPDATE_PRODUCTS") {
        update_products(payload.data);
        ProductStore.emitChange();
    }
});

export default ProductStore;