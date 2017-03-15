import React from "react";
import ReactDOM from "react-dom";

class Profile extends React.Component {
	constructor( props ) {
		super( props );
		this.state = {name: ''};
	}

	componentDidMount() {
		this.timerID = setTimeout( () => this.getProfileName(), 50 );
	}

	getProfileName() {
		var profileName = 'Stranger2';
		var self = this;

		jQuery.get( "http://cranberry.dev/wp-json/wp/v2/users/" + window.userSettings.uid ).done( function( result ) {
			if ( 'undefined' !== typeof result.name ) {
				profileName = result.name;
			}

			self.setState( {name: profileName} );
		} );
	}

	render() {
		return <div class="profile-greeting">
			Hello, <span class="profile-name">{this.state.name}</span>, these are your tasks.
		</div>
	}
}

ReactDOM.render( <Profile />, document.getElementById( "profile-container" ) );
