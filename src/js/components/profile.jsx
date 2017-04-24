class Profile extends React.Component {
	constructor( props ) {
		super( props );
		this.state = {name: ''};
	}

	componentDidMount() {
		setTimeout( () => this.getProfileName(), 50 );
	}

	getProfileName() {
		var profileName = 'person';
		var self = this;

        self.setState( {name: profileName} );
	}

	render() {
		return <div class="profile-greeting">
			Hello, <span class="profile-name">{this.state.name}</span>, these are your tasks.
		</div>
	}
}

export default Profile;
