import React from 'react';
import  MensAPI  from '../Assets/Mensdata2'; 
import { useNavigate } from 'react-router-dom';
import mensBanner from '../Assets/banner_mens.png'

const Collection = () => {
  const navigate = useNavigate();


  const handleAddToCart = (item) => {
    navigate('/cart', { state: { item: item } });
  };
  return (
    <div className='popular'>
      <h1 className="text-center">Men's Collection</h1>
      <hr />

      <div className="Popular_item" style={{ overflowX: 'auto', maxWidth: '100vw' }}>
        {MensAPI.map((item, i) => (
          <div key={i} className="product-item">
            <img src={item.image} alt={item.name} />
            <h2>{item.name}</h2>
            <h4>{item.description}</h4>
            <h3>₹{item.price}</h3>
            <button onClick={() => handleAddToCart(item)}>Add to Cart</button>
          </div>
        ))}
      </div>
{/* <br />
      <img src={mensBanner} alt="" /> */}
    </div>
  );
}

export default Collection;
