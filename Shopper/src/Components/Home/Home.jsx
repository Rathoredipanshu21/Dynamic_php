import React from 'react'
import './Home.css'
// import hand_icon from '../Assets/hand_icon.png'
// import arrow_icon from '../Assets/arrow.png'
// import hero_image from '../Assets/hero_image.png';
import './Home.css';

const Hero = () => {
  return (
  
    <div id="hero">  
    <div className="hero">
    <video
      autoPlay
      loop
      muted
      src={require("../Assets/bc.mp4")}
    ></video>

    <div className="hero-section">
      <div className="at-container">
        <div className="at-item">
          <h1>WELCOME TO SHOPPER</h1>
        </div>
      </div>

      <div className="at-container2">
        <div className="at-item2">
          <h3>
           A Step to the be the beautiful India 
          </h3>

        </div>
      </div>
      <div
        id="chartContainer"
        style={{ height: "370px", width: "100%" }}
      ></div>
     
    </div>
  </div>
  </div>
    
  )
}

export default Hero
























