import React from 'react'
import './Offer.css'
import Exclusive from '../Assets/exclusive_image.png'

const Offers = () => {
  return (
    <div className='offers'>
      <div className="offer-left">
    <h1>Exclusive</h1>
    <h1>Offers for you</h1>
    <p>Only on best seller product</p>
    <button>Check Now</button>
      </div>
      <div className="offer-right">
    <img src={Exclusive} alt="" />
      </div>
    </div>
  )
}

export default Offers
