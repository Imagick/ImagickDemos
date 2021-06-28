

// https://gist.github.com/oriadam/396a4beaaad465ca921618f2f2444d49
// https://stackoverflow.com/questions/34980574/how-to-extract-color-values-from-rgb-string-in-javascript/44655529#44655529

export interface RgbColor {
  r: number;
  g: number;
  b: number;
}

export interface RgbaColor {
    r: number;
    g: number;
    b: number;
    a: number;
}

// TODO - rgba needs fixing.

export function colorValues(color: string): RgbaColor
{
    color = color.toLowerCase();

    // if (!color) {
    //     return;
    // }

    if (color.toLowerCase() === 'transparent')
    {
        return {r: 0, g: 0, b: 0, a: 0};
    }

    if (color[0] === '#')
    {
        if (color.length < 7)
        {
            // convert #RGB and #RGBA to #RRGGBB and #RRGGBBAA
            color = '#' + color[1] + color[1] + color[2] + color[2] + color[3] + color[3] + (color.length > 4 ? color[4] + color[4] : '');
        }

        let red = parseInt(color.substr(1, 2), 16);
        let green = parseInt(color.substr(3, 2), 16);
        let blue = parseInt(color.substr(5, 2), 16);

        if (color.length > 7) {
            let alpha = parseInt(color.substr(7, 2), 16)/255;

            return {r: red, g:green, b:blue, a: alpha};
        }

        return {r: red, g:green, b:blue, a: 1};
    }
    if (color.indexOf('rgb') === -1)
    {
        throw new Error("Bad color type [" + color  + "]");
        // // convert named colors
        // var temp_elem = document.body.appendChild(document.createElement('fictum')); // intentionally use unknown tag to lower chances of css rule override with !important
        // var flag = 'rgb(1, 2, 3)'; // this flag tested on chrome 59, ff 53, ie9, ie10, ie11, edge 14
        // temp_elem.style.color = flag;
        // if (temp_elem.style.color !== flag)
        //     return; // color set failed - some monstrous css rule is probably taking over the color of our object
        // temp_elem.style.color = color;
        // if (temp_elem.style.color === flag || temp_elem.style.color === '')
        //     return; // color parse failed
        // color = getComputedStyle(temp_elem).color;
        // document.body.removeChild(temp_elem);
    }

    if (color.indexOf('rgb') === 0)
    {
        if (color.indexOf('rgba') === -1) {
            let result = color.match(/[\.\d]+/g);

            if (result.length !== 3) {
                throw new Error("RgbColor [" + color + "] didn't have 3 colors]");
            }

            return {
                r: parseInt(result[0]),
                g: parseInt(result[1]),
                b: parseInt(result[2]),
                a: 1
            };
        }

        let result = color.match(/[\.\d]+/g);

        if (result.length !== 4) {
            throw new Error("RgbaColor [" + color + "] didn't have 4 colors]");
        }

        return {
            r: parseInt(result[0]),
            g: parseInt(result[1]),
            b: parseInt(result[2]),
            a: parseFloat(result[3])
        };
    }
}