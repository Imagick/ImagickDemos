import { h, Component } from 'preact';


// export interface Row {
//     values: Array<number>
// }
//
// export interface Values {
//     rows: Array<Array<number>>
// }

export interface KernelMatrixProps {
    name: string;
    // min: number;
    // max: number;
    values: Array<Array<number>>;
    updateFn?(row_index: number, column_index: number, newValue:any): void;
}



export class KernelMatrix extends Component<KernelMatrixProps, {}> {

    renderCell(value: number, cell_index: number, row_index: number) {
        return <span>
            <input
              key={cell_index}
              type="text"
              step="1"
              style="width: 30px"
              value={value}
              // @ts-ignore: blah blah
              onchange={(event) => this.props.updateFn(row_index, cell_index, event.target.value) }
            />
        </span>

    }

    renderRows(row: Array<number>, row_index: number) {
        let cells = row.map((value: number, cell_index: number) => this.renderCell(value, cell_index, row_index));
        return <div key={row_index}>{cells}</div>
    }

    render() {
        let rows = this.props.values.map((row: Array<number>, index: number) => this.renderRows(row, index));

        return <span>
            {this.props.name}
            {rows}
        </span>;
    }
}