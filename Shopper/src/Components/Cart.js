import React from 'react';
import { useLocation } from 'react-router-dom';
import { useNavigate } from 'react-router-dom';

import './Cart.css';

const Cart = () => {
  const location = useLocation();
  const navigate = useNavigate();

  const cart = location.state?.item || {};

  const handleRemove = () => {
    navigate(-1);
  };

  const handleOrder = async () => {
    try {
      const response = await fetch('/api/save-cart-items', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ cartItems: [cart] }), 
      });
      if (response.ok) {
        alert('Order placed successfully!');
      } else {
        throw new Error('Failed to place order');
      }
    } catch (error) {
      console.error('Error placing order:', error);
      alert('Failed to place order. Please try again.');
    }
  };

  return (
    <div className='Cart'>
      <h1>Shopping-cart</h1>
      {cart.name ? (
        <div className='item'>
          <img src={cart.image} alt={cart.name} />
          <p><b>{cart.name}</b></p>

          {cart.new_price ? (
            <p>₹<b>{cart.new_price}</b></p>
          ) : (
            <p>₹<b>{cart.price}</b></p>
          )}

          <button onClick={handleOrder}>Order</button>
          <button id='remove' onClick={handleRemove}>Remove</button>
        </div>
      ) : (
        <p className="centered-text">Your cart is empty.</p>
      )}
    </div>
  );
};

export default Cart;
