class Profile extends React.Component {
	constructor( props ) {
		super( props );
		this.state = {};
	}

	render() {
		const divStyle = {
			"font-size": "2em"
		};

		return <div className="profile-image" style={divStyle}>
			<img src="" alt={this.props.owner} />
		</div>
	}
}

export default Profile;
