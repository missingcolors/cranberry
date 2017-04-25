import Circle from "./circle.jsx";
import TagList from "./taglist.jsx";
import ItemState from "./itemstate.jsx"
import ItemDates from "./itemdates.jsx"
import Profile from "./profile.jsx"

class Item extends React.Component {
    constructor( props ) {
        super( props );
        this.state = {
            status: "In Progress",
            owner: "Jeremys"
        };
    }

    render() {
        return <div className="item">
            <Circle />
            <h2>{this.props.title}</h2>
            <TagList />
            <ItemState status={this.state.status} />
            <ItemDates />
            <Profile owner={this.state.owner}/>
        </div>
    }
}

export default Item;
