class Profile extends React.Component {
	constructor( props ) {
		super( props );
		this.state = {name: 'person'};
	}

	componentDidMount() {
		setTimeout( () => this.getProfileName(), 50 );
	}

	getProfileName() {
		const profileName = 'Person';
		const self = this;

        self.setState( {name: profileName} );
	}

	render() {
		const divStyle = {
			"font-size": "2em"
		};

		return <div class="profile-greeting" style={divStyle}>
			Hello, <span class="profile-name">{this.state.name}</span>, these are your tasks.
		</div>
	}
}

export default Profile;
