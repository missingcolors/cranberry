import React from "react";
import ReactDOM from "react-dom";
import Profile from "./components/profile.jsx";
import Application from "./components/application.jsx";

ReactDOM.render( <Profile />, document.getElementById( "profile-container" ) );
ReactDOM.render( <Application/>, document.getElementById( "application-container" ) );