import React from "react";
import ProductStore from '../stores/ProductStore';
import Item from '../components/Item';
import {getState} from '../actions/ProductAction';

let Products = React.createClass({
    mixins: [ProductStore.mixin],
    getInitialState: ()=>{
        return getState();
    },
    storeDidChange: function(){
        this.setState(getState());
    },
    render: function(){
        let items = this.state.products.map((product, key)=>{
          return (
              <div class="col-md-4" key={Math.random()+key}>
                  <Item data={product} />
              </div>
          );
        });

        return (
          <div class="row items">
            {(items.length > 0) ? items : 'Nothing found'}
          </div>
        );
    }
});

export default Products;