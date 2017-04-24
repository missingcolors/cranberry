import React from "react";
import ReactDOM from "react-dom";

class Application extends React.Component {
	render() {
		return <ul>
			<li>Task One</li>
			<li>Task Two</li>
		</ul>
	}
}

ReactDOM.render( <Application/>, document.getElementById( "application-container" ) );
