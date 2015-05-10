Advanced Search
===============

*NOTE* This document is still draft. Feedback and recommendations are aloways welcome.

Desing Principle
----------------

Kanboard supports advanced search using Kanboard Query Lanugae (KQL).

KQL is desinged to be simple, and similar to the spoken language so that users
can easily understand and use the advanced search.

Keywords
--------

You can specify keywords simply typing words. Keywords are use to search
task name.

Phrase
------

You can use `"` (double quoates) to express phrase like the following.

```kql
"My task phrase"
```

Keywords are treated as a exact phrase if quoated, they are treated as individual
keywords otherwise.

Operator
--------
You can use operators to search tasks like the following.

```
assignee:me
```

The following operators are available to use.

| attribute       | description                   | Example                   |
| --------------- | ----------------------------- | ------------------------  |
| project:        | Specify project of the task   | project:"My Project"      |
| assignee:       | Specify assignee of the task  | assignee:me               |
| status:         | Specif the status of the task | status:open               |
| color:          | Specify color of the task     | color:Yellow              |
| category:       | Specify category of the task  | category:Feature          |
| complexity:     | Specify complexity            | complexity:<3             |
| swimlane:       | Specify swimlane              | swimlane:UI               |
| updated-within: | Specify the last update       | updated-within:7d         |
| updated-after:  |                               | updated-after:2014/10/04  |
| updated-before: |                               | updated-before:2014/10/04 |
| due-within:     | Specify the due date          | due-within:7d             |
| due-after:      |                               | due-after:2014/10/04      |
| due-before:     |                               | due-before:2014/10/04     |
| due:over        | Specify overdue tasks         | due:over                  |

Boolean Operator
----------------

You can use boolean operator like 'OR' or 'NOT'.

```kql
swimlane:UI OR NOT color:red
```

Group
-----

You can use `()` (brackets) to represents group.

```kql
(color:Yellow OR color:Purple) within:3d
```

