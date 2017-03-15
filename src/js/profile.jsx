import React from "react";
import ReactDOM from "react-dom";

class Profile extends React.Component {
	render() {
		return <span class="profile-name">Someone's Name</span>
	}
}

ReactDOM.render( <Profile/>, document.getElementById( "profile-container" ) );
