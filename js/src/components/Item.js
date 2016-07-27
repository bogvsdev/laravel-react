import React from "react";

let Item = React.createClass({
    render: function(){
        return (
            <div class="product" key={Math.random()+'sdfsd'+Math.random()}>
                <div class="image">
                    <span>{'$'+this.props.data.price}</span>
                    <img src={ '/images/'+ this.props.data.image } alt={this.props.data.image}/>
                </div>
                <div class="info">
                    <h2>{this.props.data.title}</h2>
                    <p class="desc">{this.props.data.description}</p>
                    <p><a href={'#buy/'+this.props.data.id} class="btn btn-default">Buy</a></p>
                </div>
            </div>
        );
    }
});

export default Item;