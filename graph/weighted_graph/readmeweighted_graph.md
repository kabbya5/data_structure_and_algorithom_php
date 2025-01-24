## Weighted graph
A weighted graph is a type of graph in which each edge is assigned a numerical weight.
These weights often represent costs, distances, capacities, or other values associated with the 
connection between two vertices (nodes). Weighted graphs are commonly used in various

### Applications such as:
- Shortest Path Problems (e.g., Dijkstra’s or Bellman-Ford algorithm for navigation systems).
- Minimum Spanning Tree (e.g., Prim’s or Kruskal’s algorithm for network design).
- Network Flow Problems (e.g., finding maximum flow or minimum cost flow).

### Types of Weighted Graphs:
1. ### Directed Weighted Graph:
    Edges have a direction and a weight (e.g., road networks where each road has a specific one-way distance).
2. ### Undirected Weighted Graph:
    Edges are bidirectional with a weight (e.g., railway tracks where weight represents the length of the track).

### Key Algorithms for Weighted Graphs:
1. ### Dijkstra's Algorithm:
   This algorithm finds the shortest paths from a source node to all other nodes in a graph with non-negative weights. It's widely used in routing and navigation systems. 
2. ### Bellman-Ford Algorithm:
      Unlike Dijkstra's, this algorithm can handle graphs with negative weights and detects negative weight cycles. It's useful in various applications, including network routing protocols. 
3. ### Minimum Spanning Tree Algorithms:
    Algorithms like Prim's and Kruskal's find a subset of edges that connect all vertices with the minimum possible total edge weight, which is essential in network design to minimize costs.
