import './bootstrap';

import { createApp } from 'vue'
import camelCase from 'lodash.camelcase';

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-vue]').forEach(async (el) => {
        const data = {};

        for (const attr of el.attributes) {
            const name = camelCase(attr.name);

            try {
                data[name] = JSON.parse(attr.value);
            } catch (err) {
                data[name] = attr.value;
            }
        }

        const componentName = el.getAttribute('data-vue');

        const module = await import(`./components/${componentName}.vue`);

        const instance = createApp(module.default, {
            ...data,
        }).mount(el);
    });
});

window.$commitWireState = function (uuid, state) {
    let event = new Event(`vue-state-change.${uuid}`);
    event.state = state;
    window.dispatchEvent(event);
}