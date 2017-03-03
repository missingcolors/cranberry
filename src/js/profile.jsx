import React from "react";
import ReactDOM from "react-dom";

class Profile extends React.Component {
	render() {
		return <span class="profile-name">Jeremy Felt</span>
	}
}

ReactDOM.render( <Profile/>, document.getElementById( "profile-container" ) );
