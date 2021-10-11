
import { h, Component } from "preact";

interface Link {
    description: string;
    url: string;
}

export interface NavigationProps {
    links: Array<Link>;
    current_link: string|null;
}

interface NavigationState {
    search: string;
}

export class NavigationPanel extends Component<NavigationProps, NavigationState> {

    constructor(props: NavigationProps, state: any) {
        super(props);
        this.state = {
            search: ""
        };
    }

    filterLinks(link:Link, index:number) {
        if (this.state.search === "") {
            return true;
        }

        let search_lower_case = this.state.search.toLowerCase();
        let link_description_lower_case = link.description.toLowerCase();

        return link_description_lower_case.includes(search_lower_case);
    }

    renderLink(link:Link, index:number) {
        let class_name = 'smallPadding';
        let nav_space_class = 'navSpacer';

        if (this.props.current_link === link.description) {
            class_name = "smallPadding navActiveLink";
            nav_space_class = "navActive navSpacer";

        }

        // hack to prevent container being force expanded
        let desc = link.description.replace("QuadraticBezier", "Quadratic Bezier");

        return <li class={nav_space_class} key={index}>
            <a class={class_name} href={link.url}>{desc}</a>
        </li>
    }

    updateSearch(new_value:string) {
        this.setState({search: new_value});
    }

    render(props: NavigationProps, state: NavigationState) {
        let matched_links = this.props.links.filter((value:Link, index:number) => this.filterLinks(value, index))
        let links = matched_links.map((value:Link, index:number) => this.renderLink(value, index));

        let no_matches = <span></span>;

        if (links.length === 0) {
            no_matches = <div
                class='smallPadding navSpacer'
                id='searchResultNone'
                style='padding-top: 15px'>
                    No matches found
            </div>
        }

        return <div>
            <div class='smallPadding navSpacer searchContainer' role='search'   >
                <input
                    type="search"
                    class='searchBox'
                    id='searchInput'
                    placeholder="Search..."
                    name="query"
                    value={this.state.search}
                // @ts-ignore: blah blah
                oninput={(ev) => this.updateSearch(ev.target.value)}/>
            </div>
            {no_matches}
            <ul class='nav nav-sidebar smallPadding'>{links}</ul>
        </div>;
    }
}
