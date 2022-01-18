import React, { Component } from 'react';
import { Link } from 'react-router-dom';


class NavBar extends Component {
    constructor(props) {
       super();
    }

    componentWillMount() {
       
    }

   

    render() {
        return (
            <header id="header" className="d-flex align-items-center">
  <div className="container d-flex justify-content-between align-items-center">
    <div className="logo">
      <h1><a href="index.html">BEAUTY </a></h1>
      {/* <a href="index.html"><img src="assets/img/logo.png" alt className="img-fluid" /></a> */}
    </div>
    <nav id="navbar" className="navbar">
      <ul>
        <li><a className="active" href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="services.html">Services</a></li>
        <li><a href="portfolio.html">Portfolio</a></li>
        <li><a href="team.html">Team</a></li>
        <li><a href="pricing.html">Pricing</a></li>
        <li><a href="blog.html">Blog</a></li>
        <li className="dropdown"><a href="#"><span>Drop Down</span> <i className="bi bi-chevron-down" /></a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li className="dropdown"><a href="#"><span>Deep Drop Down</span> <i className="bi bi-chevron-right" /></a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
        </li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
      <i className="bi bi-list mobile-nav-toggle" />
    </nav>
  </div>
</header>

        );
    }
}


export default NavBar;