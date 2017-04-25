class ItemState extends React.Component {
    constructor( props ) {
        super( props );
        this.state = {};
    }

    render() {
        return <div className="item-state">{this.props.status}</div>
    }
}

export default ItemState;