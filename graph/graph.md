## 1. Directed Graph (Digraph):
### Definition:
Edges have a direction, meaning they point from one vertex to another.
### Example
![Directed_graph](https://github.com/user-attachments/assets/eb006718-d8da-45a4-9c3d-5e1cef000b38)
### Vertices (Nodes):

### Labeled as A, B, C, D, E, and F 
These represent points in the graph.
Edges (Arrows):

Directed edges (arrows) point from one node to another.
The direction of the arrow indicates the flow or relationship from the start node to the end node.
Directed Relationships:

There is an arrow from A to B, meaning a direct path from node A to node B.
Similarly, arrows are from B to c, C to E, etc.


## 2. Directed Graph (Digraph):
### Definition:
An unweighted graph is a type of graph in which all edges are considered to have the same "weight" or no weight at all. In other words, each edge is treated as equal, meaning there is no distinction between the edges in terms of cost, distance, or any other metric

### Applications
 - Social networks (friendship connections).
 - Routing problems (like finding the shortest number of hops in a network).
 - Simple undirected graphs where you just need to track connections.

### Important 
- The shortest path in an unweighted graph can be efficiently computed using Breadth-First Search (BFS). BFS guarantees the shortest path regarding the number of edges because it explores all vertices at the current distance before moving to the next distance level.
- Dijkstra’s Algorithm algorithms is not typically used for unweighted graphs
- Pathfinding: DFS can explore all paths, though it doesn't guarantee the shortest.
-Cycle Detection: Useful for detecting cycles in a graph.
-Connectivity Check: Can verify if all nodes are reachable from a given node.
-Topological Sorting: Useful in Directed Acyclic Graphs (DAGs).



