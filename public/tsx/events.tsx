

export enum EventType {
    set_image_params = "set_image_params",
}

let eventListeners:object = {};

for (let eventType in EventType) {
    // @ts-ignore: any ...
    eventListeners[eventType] = {};
}

export function registerEvent(eventType:EventType, name:string, fn:Function) {
    // TODO - this is redundant type check.
    // @ts-ignore: any ...
    if (eventListeners[eventType] === undefined) {
        console.error('unknown event type ' + event);
        return;
    }
    // @ts-ignore: any ...
    eventListeners[eventType][name] = fn;
}

export function unregisterEvent(event:string, name:string) {
    // @ts-ignore: any ...
    delete eventListeners[event][name];
}

export function triggerEvent(eventType:EventType, params:Object) {
    // @ts-ignore: any ...
    if (eventListeners[eventType] === undefined) {
        console.error('unknown event type ' + event);
        return;
    }
    // @ts-ignore: any ...
    let callbacks = eventListeners[eventType];

    let keys = Object.keys(callbacks);
    for (let i in keys) {
        let keyName = keys[i];
        let fn = callbacks[keyName];
        fn(params);
    }
}
