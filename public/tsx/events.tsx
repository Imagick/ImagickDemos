
export enum EventType {
    set_image_params = "set_image_params",
    set_feelings_params = "set_feelings_params",
}

type EventData = {
    eventType: EventType, params: Object
}

// Whether event processing is active. Events are not processed
// until startEventProcessing is called, so that events that are
// triggered while widgets are being created, aren't dispatched
// until all widgets are loaded.
let eventProcessingActive: boolean = false;


// A queue of events that have been stored, rather than dispatched
// immediately. This is typically used when an app is starting up.
let eventDataQueue: Array<EventData> = [];

// The current listeners to events.
let eventListeners:object = {};


for (let eventType in EventType) {
    // @ts-ignore: any ...
    eventListeners[eventType] = {};
}

export function registerEvent(eventType:EventType, name:string, fn:Function) {
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

// Allow events to be processed, and process any backlog of events.
export function startEventProcessing() {
    eventProcessingActive = true;

    while (eventDataQueue.length > 0) {
        let eventData = eventDataQueue.pop();
        triggerEventInternal(
            eventData.eventType,
            eventData.params
        );
    }
}

// Stop events from being processed immediately.
export function stopEventProcessing() {
    eventProcessingActive = false;
}

// Actually process the event.
function triggerEventInternal(eventType:EventType, params:Object)
{
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

export function triggerEvent(eventType:EventType, params:Object) {

    // if event processing is active, process it.
    if (eventProcessingActive === true) {
        return triggerEventInternal(eventType, params);
    }

    // If not, store the data for later processing.
    eventDataQueue.push({eventType, params})
}
