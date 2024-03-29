import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import './NewCollection.css';
import new_collections from '../Assets/new_collections';

const NewCollection = () => {
  const navigate = useNavigate();

  const handleAddToCart = (item) => {
    navigate('/cart', { state: { item: item } });
  };

  return (
    <div className='new-collection'>
      <h1>New Collection</h1>
      <hr/>
      <div className="Popular_item">
        {new_collections.map((item, i) => (
          <div key={i} className="product-item">
            <img src={item.image} alt={item.name} />
            <h3>{item.name}</h3>
            <h3>₹{item.new_price}</h3>
            <del>₹{item.old_price}</del>
            <br />
            <button onClick={() => handleAddToCart(item)}>Add to Cart</button>
          </div>
        ))}
      </div>
    </div>
  );
};

export default NewCollection;
