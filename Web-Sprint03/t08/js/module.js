class Node {
    constructor(value) {
        this.data = value;
        this.next = null;
    }
}

class List {
    constructor() {
        this.head = null;
        this.length = 0;
    }
    add(value) {
        let node = new Node(value);
        if (this.length === 0)
            this.head = node;
        else {
            let q = this.head;
            while(q.next)
                q = q.next;
            q.next = new Node(value);
        }
        this.length++;
    }
    remove(value) {
        if (this.head.data === value) {
            this.head = this.head.next;
            this.length--;
            return true;
        } else
            for (let q = this.head; q.next; q = q.next)
                if (q.next.data === value) {
                    q.next = q.next.next;
                    this.length--;
                    return true;
                }
        return false;
    }
    contains(value) {
        for (let q = this.head; q; q = q.next)
            if (q.data === value)
                return true;
        return false;
    }
    [Symbol.iterator] = function() {
        let current = this.head;
        return {
            next() {
                if (current) {
                    let value = current.data;
                    current = current.next;
                    return {value: value, done: false};
                }
                return {done: true};
            }
        };
    };
    clear() {
        this.head = null;
    }
    count() {
        return this.length;
    }
    log() {
        let res = '';
        for (let q = this.head; q; q = q.next) {
            res += q.data;
            if (q.next)
                res += ', ';
        }
        console.log(res);
    }
}

let createLinkedList = (arr) => {
    const ll = new List();
    arr.forEach(value => ll.add(value));
    return ll;
}

export {createLinkedList};
