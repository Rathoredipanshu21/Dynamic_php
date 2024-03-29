import React from 'react'
import "./Naavbar.css";
import { Link } from "react-router-dom";
import logo from '../Components/Assets/logo.png'

function Navbar() {
  return (
    <div className='nav-bar'>

      <div className="logo">
      <img src={logo} alt="" />
            <p>SHOPPER</p>
      </div>

      <div className="list">
      <ul>
        <li><Link to="/">Home</Link></li>
        <li><Link to="/about">Mens</Link></li>
        <li><Link to="/Women">Womens</Link> </li>
        <li><Link to="/contact">Contact</Link> </li>  
        <li><Link to="/cart">Cart</Link></li>
   
      </ul>
      </div>

    </div>
  );
}

export default Navbar
