import React from 'react'
import { useNavigate } from 'react-router-dom';

import WomensData from '../Assets/WomensData'

const Collection = () => {
  const navigate = useNavigate();
  
  const handleAddToCart = (item) => {
    navigate('/cart', { state: { item: item } });
  };
  return (
    <div className='popular'>
      <h1 className="text-center">Popular in women</h1>
      <hr />

      <div className="Popular_item">
        {WomensData.map((item, i) => (
          <div key={i} className="product-item">
            <img src={item.image} alt={item.name} />
            <h3>{item.description}</h3>
            <h3>₹{item.price}</h3>
            <del>₹{item.old_price}</del>
            <button onClick={() => handleAddToCart(item)}>Add to Cart</button>

          </div>
        ))}
      </div>
    </div>
  )
}

export default Collection
