class Button extends React.Component {
    constructor( props ) {
        super( props );
        this.state = {
            active: false
        }
    }

    handleClick() {
        const active = ! this.state.active;
        this.setState( {
            active: active
        } );
    }

    render() {
        const classes = this.state.active ? "button-active" : "button-inactive";

        return <div className={classes} onClick={this.handleClick.bind( this )}>{this.props.text}</div>
    }
}

export default Button;
