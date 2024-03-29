import React, { useState } from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Navbar from "./Components/Navbar";
import Main from "./Components/Home/Main";
import Footer from "./Components/Footer";
import Cart from "./Components/Cart";
import MainAbout from "./Components/About/MainAbout";
import Women from "./Components/Women/Women";
import Contact from "./Components/Contact/Contact";

const App = () => {
  const [cartItems, setCartItems] = useState([]);

  const handleAddToCart = (item) => {
    setCartItems([...cartItems, item]);
  };

  return (
    <div className="App">
      <BrowserRouter>
        <Navbar />
        <Routes>
          <Route path="/" element={<Main />} />
          <Route path="/Women" element={<Women />} />
          <Route path="/Contact" element={<Contact />} />
          <Route path="/cart" element={<Cart cartItems={cartItems} />} />
          <Route path="/about" element={<MainAbout />} />
        </Routes>
        <Footer />
      </BrowserRouter>
    </div>
  );
};

export default App;







