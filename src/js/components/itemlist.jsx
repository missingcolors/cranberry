import Item from "./item.jsx"

class ItemList extends React.Component {
    constructor( props ) {
        super( props );
        this.state = {};
    }

    render() {
        return <div className="item-list">
            <Item title="Find project management software solution" />
            <Item title="Another todo on a long list of todos" />
            <Item title="A child todo of another todo" />
            <Item title="A child todo of another todo's child todo" />
            <Item title="Find project management software solution" />
        </div>
    }
}

export default ItemList;