import React , {Component} from 'react';
import './App.css';
import Navbar from './components/Navbar';
import Landing from './pages/Landing';
import Footer from './components/Footer';

import { BrowserRouter, Route, Routes } from "react-router-dom";
class App extends Component {
   render() {

    return (    
      <BrowserRouter>
        <Navbar/>
        <Routes>
          <Route exact path="/" element={<Landing />} />

        </Routes>
        <Footer/>
      </BrowserRouter>
    );
  }
}

export default App;
