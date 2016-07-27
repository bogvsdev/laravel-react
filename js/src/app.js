import React from "react";
import ReactDOM from "react-dom";
import Products from './components/Products';
import {reload, setInitialValues} from './helpers/functions';
import {getState} from './actions/ProductAction';

//initial reading
if(window.location.hash.indexOf('filter') !== -1){
    setInitialValues();                
    reload();
}else{
    reload(false);
}
      
const app = document.querySelector('.product-container');
ReactDOM.render(<Products />, app); 