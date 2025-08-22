importScripts("/precache-manifest.98145a984ab8d25a5b3e904a8f891b67.js", "https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js");

import {clientsClaim} from 'workbox-core';
import {precacheAndRoute} from 'workbox-precaching';
import {registerRoute} from 'workbox-routing';
import {CacheFirst, StaleWhileRevalidate} from 'workbox-strategies';
import {CacheableResponsePlugin} from 'workbox-cacheable-response';

clientsClaim();

self.skipWaiting();

precacheAndRoute(self.__WB_MANIFEST);

registerRoute(
    ({url}) => url.pathname.startsWith('/scripts/'),
    new StaleWhileRevalidate({
        plugins: [
            new CacheableResponsePlugin({
                statuses: [200]
            })
        ]
    })
);

registerRoute(
    ({url}) => url.pathname.startsWith('/styles/'),
    new StaleWhileRevalidate({
        plugins: [
            new CacheableResponsePlugin({
                statuses: [200]
            })
        ]
    })
);

registerRoute(
    ({url}) => url.pathname.startsWith('/fonts/'),
    new CacheFirst({
        cacheName: 'asset',
        plugins: [
            new CacheableResponsePlugin({
                statuses: [200]
            })
        ]
    })
);
