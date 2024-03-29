import React from 'react';
import { useNavigate } from 'react-router-dom';
import './Popular.css'; 
import data_product from '../Assets/data';

const Popular = () => {
  const navigate = useNavigate();

  const handleAddToCart = (item) => {
    navigate('/cart', { state: { item: item } });
  };


  return (
    
    <div className='popular'>
      <h1 className="text-center">Popular in women</h1>
      <hr />

      
      <div className="Popular_item">
        
        {data_product.map((item, i) => (
          <div key={i} className="product-item">
            <img src={item.image} alt={item.name} />
            <h3>{item.name}</h3>
            <h3>₹{item.new_price}</h3>
            <del>₹{item.old_price}</del>
            <button onClick={() => handleAddToCart(item)}>Add to Cart</button>

          </div>
        ))}
      </div>
    </div>
  );
}

export default Popular;
